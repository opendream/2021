
param = input("enter number : ")
try:
	intParam = int(param)
	print("output is : ", end="")
	if intParam % 3 < 1 and intParam % 5 < 1:
		print("FizzBuzz")
	elif intParam % 3 < 1:
		print("Fizz")
	elif intParam % 5 < 1:
		print("Buzz")
	else:
		print(param)
except Exception as e:
	print("error occurs!! - please input only number")
