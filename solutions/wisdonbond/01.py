# 10 min
for input_data in range(1, 100):
    temp = ''
    if input_data % 3 == 0:
        temp = temp + 'Fizz'
    if input_data % 5 == 0:
        temp = temp + 'Buzz'

    print(input_data if not temp else temp)
