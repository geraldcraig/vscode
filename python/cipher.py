text = input("Enter word to cipher: ")
num = int(input("enter birth month: "))
cipher = ''
for char in text:
    if not char.isalpha():
        continue
    char = char.upper()
    code = ord(char) + num
    if code > ord('Z'):
        code = ord('A')
    cipher += chr(code)

print(cipher)
