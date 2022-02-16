def countchr(Input):
    countdict = {}
    countdict = dict((i, Input.count(i)) for i in Input)
    Output = ''
    for key,value in countdict.items():
        Output += '{}{}'.format(key,value)
    return Output