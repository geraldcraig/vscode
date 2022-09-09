"""
Caesar Cipher
Create a simple cipher generator – when a word is entered, 
it will convert it to ciphertext based on a given ‘key’ 
based on your birth month (01 to 12).
"""

# function to encrypt phrase using birth month number as the key
def encryption(text, key):
    cipher = ''
    for i in text:
        if i.isupper():
            temp = 65 + ((ord(i) - 65 + key) % 26)
            cipher = cipher + chr(temp)
        elif i.islower():
            temp = 97 + ((ord(i) - 97 + key) % 26)
            cipher = cipher + chr(temp)
        else:
            cipher = cipher + i

    print("The cipertext is: ", cipher)

text = input("Enter phrase to encrypt: ")

month = input("Enter your birth month: ")

if not month.isalpha():
    print("Error...month must contain letters only")
else:
    month = month.lower()
    if month == "jan" or month == "january":
        key = 1
    elif month == "feb" or month == "february":
        key = 2
    elif month == "mar" or month == "march":
        key = 3
    elif month == "apr" or month == "april":
        key = 4
    elif month == "may":
        key = 5
    elif month == "jun" or month == "june":
        key = 6
    elif month == "jul" or month == "july":
        key = 7
    elif month == "aug" or month == "august":
        key = 8
    elif month == "sep" or month == "september":
        key = 9
    elif month == "oct" or month == "october":
        key = 10
    elif month == "nov" or month == "november":
        key = 11
    elif month == "dec" or month == "december":
        key = 12
    else:
        print("error")

encryption(text, key)