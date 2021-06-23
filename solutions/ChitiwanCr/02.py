def isPrimeNumber(num):
    if num > 1:
        for i in range(2,num):
            if(num%i == 0):
                return False    
        return True
    else:
        return False

def listPrimeNumber(userInput):
    arrSize = len(userInput)
    resultPlus = [(userInput[x],userInput[y]) for x in range(0,arrSize-1) for y in range(x+1,arrSize) if(isPrimeNumber(userInput[x]+userInput[y]))]
    resultMinus = [(userInput[x],userInput[y]) for x in range(0,arrSize-1) for y in range(x+1,arrSize) if(isPrimeNumber(abs(userInput[x]-userInput[y])))]
    print('Pair of plus number: ' + str(resultPlus))
    print('Pair of minus number: ' + str(resultMinus))


if __name__ == "__main__":
    userInput = input("Number 1-100(e.g. 1 5 17 20): ")
    userInput = [int(i) for i in userInput.split(" ")]
    listPrimeNumber(userInput)
