"""
Caesar Cipher
Create a simple cipher generator – when a word is entered, 
it will convert it to ciphertext based on a given ‘key’ 
based on your birth month (01 to 12).
"""
num = 0
text = input("Enter a word to convert to ciphertext: ")
if not text.isalpha():
    print("Error...must only contain letters")
else:
    month = input("Enter your birth month: ")
    if not month.isalpha():
        print("Error...month must contain letters only")
    else:
        if month.lower() == ("jan" or "january"):
            num = 1
            print(num)
        elif month.lower() == ("feb" or "february"):
            num = 2
            print(num)
        elif month.lower() == ("mar" or "march"):
            num = 3
            print(num)
        elif month.lower() == ("apr" or "april"):
            num = 4
            print(num)
        elif month.lower() == "may":
            num = 5
            print(num)
        elif month.lower() == ("jun" or "june"):
            num = 6
            print(num)
        elif month.lower() == ("jul" or "july"):
            num = 7
            print(num)
        elif month.lower() == ("aug" or "august"):
            num = 8
            print(num)
        elif month.lower() == ("sep" or "september"):
            num = 9
            print(num)
        elif month.lower() == ("oct" or "october"):
            num = 10
            print(num)
        elif month.lower() == ("nov" or "november"):
            num = 11
            print(num)
        elif month.lower() == ("dec" or "december"):
            num = 12
            print(num)
        else:
            print("error")
        
        cipher = ''
        for char in text:
            char = char.upper()
            code = ord(char) + num
            if code > ord('Z'):
                code = ord('A')
            cipher += chr(code)

        print(cipher)
