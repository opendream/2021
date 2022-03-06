import collections

word = input("Please key some wording here :")

#string = "Hello world"
frequencies = collections.Counter(word)
repeated = {}

for key, value in frequencies.items():


    if value >= 1:
        repeated[key] = value



print(repeated)