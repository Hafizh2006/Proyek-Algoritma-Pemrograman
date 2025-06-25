import tkinter as tk
from tkinter import messagebox

def inputAdmin():
    try:
        if username == "admin" and password == "admin1234":
            print("Login Berhasil")
        else:
            print("Password salah, silahkan coba")
        messagebox.showinfo("Login berhasil!!!")
    except ValueError:
        messagebox.showerror("Login gagal, silahkan coba lagi")


def inputMahasiswa():
    print("Menu: 1. Lihat Data 2. Urutkan Data 3. Masukkan Kedalam Excel")
    menu = input("Pilih menu: ")
    

window = tk.Tk()

window.title("SISTEM MANAJEMEN DATA MAHASISWA")

username = tk.Label(window, text="Username: ")
username.pack(pady=5)

entryUser = tk.Entry(window)
entryUser.pack(pady=5)

password = tk.Label(text="Password: ")
password.pack(pady=5)

entry = tk.Entry(window)
entry.pack(pady=5)

tombol = tk.Button(window, text="LOGIN", command=inputAdmin)
tombol.pack(pady=10)

window.mainloop()

