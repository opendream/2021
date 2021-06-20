# start 10.34 at 06/19/2021
# End 10.38 at 06/19/2021

def FizzBuzz(n):
    if (n > 0 and n <= 100):
        if ((n % 3 == 0) and (n % 5 == 0)):
            return ("FizzBuzz")
        elif (n % 5 == 0):
            return ("Buzz")
        elif (n % 3 == 0):
            return ("Fizz")
        else:
            return (n)
    else:
        return (n)

# test case
print(FizzBuzz(0))      # 0
print(FizzBuzz(-1))     # -1
print(FizzBuzz(1))      # 1
print(FizzBuzz(100))    # Buzz
print(FizzBuzz(101))    # 101
print(FizzBuzz(3))      # Fizz
print(FizzBuzz(9))      # Fizz
print(FizzBuzz(25))     # Buzz
print(FizzBuzz(15))     # FizzBuzz
print(FizzBuzz(60))     # FizzBuzz
