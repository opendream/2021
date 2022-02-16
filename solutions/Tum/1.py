import sys
state = False
while not(state):
    try:
        Input = int(input('Please enter a number from 1-100.\nInput: '))
        if (Input<=100) and (Input>=1):
            state = True
            Output = ''
            if Input%3 == 0:
                Output = 'Fizz'
            if Input%5 == 0:
                Output += 'Buzz'
            if Output == '':
                Output = str(Input)
        print('Output :',Output)
    except KeyboardInterrupt:
        sys.exit(0)
    except:
        pass

# input ที่ใส่ต้องเป็นตัวเลข 1-100 ถ้าใส่เป็นตัวอื่นระบบจะให้ใส่ใหม่อีกครั้งครับ