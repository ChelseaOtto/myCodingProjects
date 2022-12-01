import json  #imports json file
# import nltk file with functions
from nltk_utils import tokenize, stem, bag_of_words
import numpy as np

import torch 
import torch.nn as nn
from torch.utils.data import Dataset, DataLoader

from model import NeuralNet

with open('intents.json', 'r') as f:
    intents = json.load(f)

# Arrays of values in intent file
allWords = []
tags = []
xy = []

# For-loop of intents file
for intent in intents['intents']:
    tag = intent['tag']
    tags.append(tag)
    for pattern in intent['patterns']:
        w = tokenize(pattern)
        allWords.extend(w)
        xy.append((w, tag)) #tuple


ignore_words = ['?', ',', '.', '!']
allWords = [stem(w) for w in allWords if w not in ignore_words]
allWords = sorted(set(allWords))
tags = sorted(set(tags))

x_train = []
y_train = []

for (pattern_sentence, tag) in xy:
    bag = bag_of_words(pattern_sentence, allWords)
    x_train.append(bag)

    # Numbers label tags
    label = tags.index(tag)
    y_train.append(label) # CrossEntropyLoss


x_train = np.array(x_train)
y_train = np.array(y_train)


# Iterates over it for batch training
# New data set
class ChatDataset(Dataset):
    def __init__(self): 
        self.n_samples = len(x_train)
        self.x_data = x_train
        self.y_data = y_train

    # Dataset[idx]
    def __getitem__(self, index):
        return self.x_data[index], self.y_data[index]

    def __len__(self):
        return self.n_samples


# Hyperparameters
batch_size = 8
hidden_size = 8
output_size = len(tags)
input_size = len(x_train[0])
learning_rate = 0.001
num_epochs = 1000

# testing 
#print(input_size, len(allWords))
#print(output_size, tags)


# Calling class objects
dataset = ChatDataset()
train_loader = DataLoader(dataset=dataset, batch_size=batch_size, shuffle=True, num_workers=0)


# Model
device = torch.device('cuda' if torch.cuda.is_available() else 'cpu')
model = NeuralNet(input_size, hidden_size, output_size).to(device)


# Loss and optimizer
criterion = nn.CrossEntropyLoss()
optimizer = torch.optim.Adam(model.parameters(), lr = learning_rate)

# Training Loop
for epoch in range(num_epochs):
    for (words, labels) in train_loader:
        words = words.to(device)
        labels = labels.to(dtype = torch.long).to(device)

        # Forward
        outputs = model(words)
        loss = criterion(outputs, labels)

        # Backward and optimizer step
        optimizer.zero_grad()
        loss.backward()
        optimizer.step()

    if (epoch +1) % 100 == 0:
        print(f'epoch {epoch+1}/{num_epochs}, loss = {loss.item():.4f}')

print(f'final loss, loss = {loss.item():.4f}')


# Saves the data
data = {
    "model_state": model.state_dict(),
    "input_size": input_size,
    "output_size": output_size,
    "hidden_size": hidden_size,
    "allWords": allWords,
    "tags": tags
}

# pytorch file
FILE = "data.pth" #For pytorch
torch.save(data, FILE)
print(f'training complete. file saved to {FILE}')


# testing
#print(tags)
#print(allWords)
#print(intents)