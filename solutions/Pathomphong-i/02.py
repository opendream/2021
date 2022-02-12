def thai_compare(first, second):
    # อย > อ
    # หง > ง
    # หญ > ญ
    # หน > น
    # หม > ม
    # print(ord("ก"))
    # print(ord("ฮ"))
    # print(ord("ะ"))
    # print(ord("ๅ")) 
    # list_num = ["อย", "หง","หญ","หน","หม"]
    # assemble
    vowels_first=''
    chars_first=''
    for char_f in first:
        if ord(char_f) >=3632 and ord(char_f) <= 3653:  # สระ
            vowels_first += char_f
            chars_first += ' '
        elif ord(char_f) >=3585 and ord(char_f) <= 3630: #พยัญชนะ
            chars_first += char_f
            vowels_first += ' '
        else: #ตัวสะกด
            chars_first += ' '

    vowels_second=''
    chars_second=''

    for char_s in second:
        if ord(char_s) >= 3632 and ord(char_s) <= 3653:  #สระ
            vowels_second += char_s
            chars_second += ' '
        elif(ord(char_s) >= 3585 and ord(char_s) <= 3630): #พยัญชนะ
            chars_second += char_s
            vowels_second += ' '
    # split
    list_chars_fist = chars_first.split(" ")
    list_chars_second = chars_second.split(" ")
    list_vowels_fist = vowels_first.split(" ")
    list_vowels_second = vowels_second.split(" ")
    # trim " "
    list_chars_fist = [s for s in list_chars_fist if s != '']
    list_chars_second = [s for s in list_chars_second if s != '']
    list_vowels_fist = [s for s in list_vowels_fist if s != '']
    list_vowels_second = [s for s in list_vowels_second if s != '']
   
    # print(list_chars_fist,list_chars_second)
    #กฮ ถ้าอักษรนำยาวเท่ากัน เทียบทีละตัว
    if len(list_chars_fist[0]) == len(list_chars_second[0]):
        for index, data in enumerate(list_chars_fist[0]):
            if ord(data)<ord(list_chars_second[0][index]):
                return True
            if ord(data)>ord(list_chars_second[0][index]):
                return False
    #ถ้ายาวไม่เท่า วว/ว อย/ย
    else:
        # เทียบตัวแรก
        if ord(list_chars_fist[0][0]) < ord(list_chars_second[0][0]):
            return True
        if ord(list_chars_fist[0][0]) == ord(list_chars_second[0][0]):
            #แรกเท่าเทียบตัวหลังกรณีไม่ใช่อักษรนำ
            if ord(list_chars_fist[0][-1]) < ord(list_chars_second[0][-1]):
                return True
        # #ตัวแรกเท่า
        # elif ord(list_chars_fist[0][-1]) == ord(list_chars_second[0][-1]) and list_chars_fist[0] in list_num: 
            
        #     if len(list_chars_fist[0]) > len(list_chars_second[0]):
        #         return True
    #vowels
    if len(list_vowels_fist) < len(list_vowels_second):
        round = len(list_vowels_fist)
    else:
        round = len(list_vowels_second) 
    

    for index_vow in range(round):
        if ord(list_vowels_fist[index_vow]) < ord(list_vowels_second[index_vow]):
            return True

        if ord(list_vowels_fist[index_vow]) > ord(list_vowels_second[index_vow]):
            return False
            
    return False



def mergeSort(arr):
    if len(arr) > 1:
        mid = len(arr)//2
        L = arr[:mid]
        R = arr[mid:]
        mergeSort(L)
        mergeSort(R)
        i = j = k = 0
        # clone data to temp
        while i < len(L) and j < len(R):
            # print(L[i],R[j])
            if thai_compare(L[i],R[j]):
                # print(L[i])
                arr[k] = L[i]
                i += 1
            else:
                # print(R[j])
                arr[k] = R[j]
                j += 1
            k += 1
        # Checking sorted
        while i < len(L):
            arr[k] = L[i]
            i += 1
            k += 1
        while j < len(R):
            arr[k] = R[j]
            j += 1
            k += 1

  
if __name__ == '__main__':
    # print(thai_compare("แว่น","วาว")) #compare
    arr = ["ไก่", "กา", "ขา", "แก", "แขวน", "เกีย"] #pass
    # arr = ["ขอ", "ให้", "เจริญ", "นะ", "จ๊ะ", "หนุ่ม", "สาว", "ทั้ง", "หลาย"] #pass
    # arr = ["เสือ","สาว","ใส่","แว่น","แวว","วาว"] #bug
    mergeSort(arr)
    print(arr)