def main(userInput):
    if(userInput>100 or userInput<1):
        print(userInput)
        return
    if(userInput%3 == 0 and userInput%5 == 0):
        print('FizzBuzz')
    elif(userInput%5 == 0):
        print('Buzz')
    elif(userInput%3 == 0):
        print('Fizz')
    else:
        print(userInput)

if __name__ == "__main__":
    userInput = int(input("Number 1-100: "))
    main(userInput)
