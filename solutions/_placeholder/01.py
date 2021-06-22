print('This is for test #1')


# Take 25 minutes
import operator
def fizzBuzz(values):
    for value in values:
        isFizz = operator.mod(value, 3) == 0
        isBuzz = operator.mod(value, 5) == 0

        if isFizz is True and isBuzz is False:
            print('Fizz')
        elif isFizz is False and isBuzz is True:
            print('Buzz')
        elif isFizz is True and isBuzz is True:
            print('Fizz Buzz')
        else:
            print(value)


values = range(1,100)
fizzBuzz(values)