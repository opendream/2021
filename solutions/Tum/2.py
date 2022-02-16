def sortstr(Input):
    tone = {'0e48':'01','0e49':'02','0e4a':'03','0e4b':'04'}
    Inputdict = {}
    for word in Input:
        listword = []
        for c in word:
            hexadecimal = '%04x' % ord(c)
            listword.append(hexadecimal)
        Inputdict[word] = listword
    for key,value in Inputdict.items():
        if value[0] > '0e2f':
            value[0], value[1] = value[1], value[0]
        for i,j in enumerate(value):
            if j in tone:
                value.remove(j)
                value.append(tone[j])
        Inputdict[key] = value
    Output = list((dict(sorted(Inputdict.items(), key=lambda item: item[1]))).keys())
    return Output