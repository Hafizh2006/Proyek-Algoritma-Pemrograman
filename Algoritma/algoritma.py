import tkinter as tk

maksData = 5
kolom = 8
data = [[None for _ in range(kolom)] for _ in range(maksData)]
jumlah = 0  

def inputData():
    global jumlah
    if jumlah >= maksData:
        print("Data sudah penuh.")
        return
    n = int(input(f"Berapa data yang ingin diinputkan? (maks {maksData - jumlah}): "))
    if jumlah + n > maksData:
        n = maksData - jumlah
        print(f"Data dibatasi hanya {n} data.")
    print("\n-- Input Data Mahasiswa --")
    for i in range(jumlah, jumlah + n):
        print(f"\nData mahasiswa ke-{i+1}")
        data[i][0] = input("NIM             : ")
        data[i][1] = input("Nama            : ")
        data[i][2] = input("Jenis Kelamin   : ")
        data[i][3] = input("Tempat Lahir    : ")
        data[i][4] = input("Tanggal Lahir   : ")
        data[i][5] = input("Fakultas        : ")
        data[i][6] = input("Jurusan         : ")
        data[i][7] = input("Angkatan        : ")
    jumlah += n

def tampilData():
    if jumlah == 0:
        print("\nBelum ada data yang tersimpan.")
        return
    print("\n-- Daftar Data Mahasiswa --")
    for i in range(jumlah):
        print(f"\nData ke-{i+1}")
        print("NIM            :", data[i][0])
        print("Nama           :", data[i][1])
        print("Jenis Kelamin  :", data[i][2])
        print("Tempat Lahir   :", data[i][3])
        print("Tanggal Lahir  :", data[i][4])
        print("Fakultas       :", data[i][5])
        print("Jurusan        :", data[i][6])
        print("Angkatan       :", data[i][7])

def ubahData():
    if jumlah == 0:
        print("\nBelum ada data.")
        return
    print("\n-- Ubah Data Mahasiswa --")
    nim_cari = input("Masukkan NIM mahasiswa yang ingin diubah: ")
    index = -1
    for i in range(jumlah):
        if data[i][0] == nim_cari:
            index = i
            break
    if index == -1:
        print("Data tidak ditemukan.")
        return

    print("\nData lama:")
    print("Nama           :", data[index][1])
    print("Jurusan        :", data[index][6])

    nama_baru = input("Nama baru (kosongkan jika tidak diubah): ")
    jurusan_baru = input("Jurusan baru (kosongkan jika tidak diubah): ")

    if nama_baru.strip():
        data[index][1] = nama_baru
    if jurusan_baru.strip():
        data[index][6] = jurusan_baru
    print("Data berhasil diubah.")

def hapusData():
    if jumlah == 0:
        print("\nBelum ada data.")
        return
    nim_cari = input("Masukkan NIM mahasiswa yang akan dihapus: ")
    index = -1
    for i in range(jumlah):
        if data[i][0] == nim_cari:
            index = i
            break
    if index == -1:
        print("Data tidak ditemukan.")
        return
    # geser data
    for i in range(index, jumlah - 1):
        data[i] = data[i+1]
    for j in range(kolom):
        data[jumlah - 1][j] = None
    jumlah -= 1
    print("Data berhasil dihapus.")

def cariData():
    if jumlah == 0:
        print("\nBelum ada data.")
        return
    nama = input("Masukkan nama yang dicari: ")
    ditemukan = False
    for i in range(jumlah):
        if data[i][1].lower() == nama.lower():
            print("\nData ditemukan:")
            print("NIM            :", data[i][0])
            print("Nama           :", data[i][1])
            print("Jenis Kelamin  :", data[i][2])
            print("Tempat Lahir   :", data[i][3])
            print("Tanggal Lahir  :", data[i][4])
            print("Fakultas       :", data[i][5])
            print("Jurusan        :", data[i][6])
            print("Angkatan       :", data[i][7])
            ditemukan = True
    if not ditemukan:
        print("Data tidak ditemukan.")

#Sorting secara Bubble Sort
# def urutkanDataAscending():
#     for i in range(jumlah - 1):
#         for j in range(jumlah - i - 1):
#             if data[j][0] > data[j+1][0]:
#                 data[j], data[j+1] = data[j+1], data[j]
#     print("Data berhasil diurutkan secara ascending berdasarkan NIM.")

# def urutkanDataDescending():
#     for i in range(jumlah - 1):
#         for j in range(jumlah - i - 1):
#             if data[j][0] < data[j+1][0]:
#                 data[j], data[j+1] = data[j+1], data[j]
#     print("Data berhasil diurutkan secara descending berdasarkan NIM.")

#Sorting secara selection sort dari AI
def urutkanDataAscending():
    for i in range(jumlah):
        min_index = i
        for j in range(i + 1, jumlah):
            if data[j][0] < data[min_index][0]:  # Bandingkan NIM
                min_index = j
        if min_index != i:
            data[i], data[min_index] = data[min_index], data[i]
    print("Data berhasil diurutkan secara ascending berdasarkan NIM.")

def urutkanDataDescending():
    for i in range(jumlah):
        max_index = i
        for j in range(i + 1, jumlah):
            if data[j][0] > data[max_index][0]:  # Bandingkan NIM
                max_index = j
        if max_index != i:
            data[i], data[max_index] = data[max_index], data[i]
    print("Data berhasil diurutkan secara descending berdasarkan NIM.")


def adminMenu():
    while True:
        print("\n--- Menu Admin ---")
        print("1. Input data baru")
        print("2. Ubah data")
        print("3. Hapus data")
        print("4. Tampilkan data")
        print("5. Urutkan data ascending")
        print("6. Urutkan data descending")
        print("0. Logout")
        pilihan = input("Pilih menu: ")
        if pilihan == "1":
            inputData()
        elif pilihan == "2":
            ubahData()
        elif pilihan == "3":
            hapusData()
        elif pilihan == "4":
            tampilData()
        elif pilihan == "5":
            urutkanDataAscending()
        elif pilihan == "6":
            urutkanDataDescending()
        elif pilihan == "0":
            break
        else:
            print("Pilihan tidak valid.")

def mahasiswaMenu():
    while True:
        print("\n--- Menu Mahasiswa ---")
        print("1. Cari data")
        print("2. Tampilkan data")
        print("0. Logout")
        pilihan = input("Pilih menu: ")
        if pilihan == "1":
            cariData()
        elif pilihan == "2":
            tampilData()
        elif pilihan == "0":
            break
        else:
            print("Pilihan tidak valid.")

def login():
    while True:
        print("\n=== Login Sistem ===")
        username = input("Username : ")
        password = input("Password : ")
        if username == "admin" and password == "admin1234":
            print("Login sebagai admin berhasil.")
            adminMenu()
        elif username == "mahasiswa" and password == "mahasiswa1234":
            print("Login sebagai mahasiswa berhasil.")
            mahasiswaMenu()
        else:
            print("Login gagal. Coba lagi.")

# jalankan program
login()
