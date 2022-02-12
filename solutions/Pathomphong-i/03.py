def count_string(word):
    length = 0
    count = []
    char_list = []
    for char in word:
        if char in char_list:
            count[char_list.index(char)] += 1
        else:
            char_list.append(char)
            count.append(1)
            length += 1
    ans = ''
    for index in range(length):

        ans = ans + (char_list[index]) + str(count[index])
    print(ans)


count_string("HELLOWORLD")
