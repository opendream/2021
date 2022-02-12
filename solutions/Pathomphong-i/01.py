def FizzBuzz(number):
        if number%15 == 0:
            return ("FizzBuzz")
        elif number%3==0:
            return("Fizz")
        elif number%5==0:
            return("Buzz")
        else:
            return("input")
        
def print_FizzBuzz(start, stop):
    for number in range(start, stop+1):
        print (FizzBuzz(number))

print_FizzBuzz(1,100)