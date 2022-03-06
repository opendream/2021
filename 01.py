for fizzbuzz in range(1, 100):

    if fizzbuzz % 15 == 0:
        print("FizzBuzz")
        continue


    elif fizzbuzz % 3 == 0:
        print("Fizz")
        continue

    elif fizzbuzz % 5 == 0:
        print("Buzz")
        continue

    else:
        print("input")
        continue

    print(fizzbuzz)
