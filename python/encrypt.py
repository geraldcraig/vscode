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

    print("The ciphertext is:", cipher)

month = ["january", "february", "march", "april", "may", "june", "july", "august", "september", "october", "november", "december"]

text = input("Enter phrase to encrypt: ")

birthMonth = input("Enter your birth month: ")

birthMonth = birthMonth.lower()

while True:
    if birthMonth in month:
        key = month.index(birthMonth) + 1
        encryption(text, key)
        break
    else:
        birthMonth = input("Sorry not recognised, please enter a valid month: ")
        birthMonth = birthMonth.lower()


