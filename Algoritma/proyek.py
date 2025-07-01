import tkinter as tk
from tkinter import messagebox, simpledialog

# contoh data sementara (simulasi database)
maksData = 10
kolom = 3
data_mahasiswa[maksData][kolom]
jumlah = input()

def inputData():
    print("Masukkan jumlah data yang ingin diinputkan: " + jumlah)
    for i in range(jumlah):
        print("NIM: " + data_mahasiswa[i][0])
        print("Nama: " + data_mahasiswa[i][1])
        print("Jurusan: " + data_mahasiswa[i][2])

def refresh_data():
    # hanya contoh print ke console
    print("=== DATA SEKARANG ===")
    for d in data_mahasiswa:
        print(d)

# ------------------------
# fungsi menu Admin
# ------------------------

def ubah_data():
    refresh_data()
    nim = simpledialog.askstring("Ubah Data", "Masukkan NIM data yang mau diubah:")
    for d in data_mahasiswa:
        if d["NIM"] == nim:
            nama_baru = simpledialog.askstring("Ubah Nama", f"Nama baru untuk {d['Nama']}:")
            jurusan_baru = simpledialog.askstring("Ubah Jurusan", f"Jurusan baru untuk {d['Jurusan']}:")
            d["Nama"] = nama_baru
            d["Jurusan"] = jurusan_baru
            messagebox.showinfo("Sukses", f"Data {nim} berhasil diubah.")
            refresh_data()
            return
    messagebox.showerror("Error", "NIM tidak ditemukan.")

def tambah_data():
    nim = simpledialog.askstring("Tambah Data", "Masukkan NIM:") 
    window.destroy()
    nama = simpledialog.askstring("Tambah Data", "Masukkan Nama:")
    window.destroy()
    jurusan = simpledialog.askstring("Tambah Data", "Masukkan Jurusan:")
    window.destroy()
    data_mahasiswa.append({"NIM": nim, "Nama": nama, "Jurusan": jurusan})
    messagebox.showinfo("Sukses", f"Data {nama} berhasil ditambahkan.")
    refresh_data()

def hapus_data():
    refresh_data()
    nim = simpledialog.askstring("Hapus Data", "Masukkan NIM yang mau dihapus:")
    found = False
    index_to_delete = -1  # penanda indeks

    for i in range(len(data_mahasiswa)):
        if data_mahasiswa[i]["NIM"] == nim:
            found = True
            index_to_delete = i
            break

    if found:
        confirm = messagebox.askyesno("Konfirmasi", f"Yakin ingin menghapus data {data_mahasiswa[index_to_delete]['Nama']}?")
        if confirm:
            del data_mahasiswa[index_to_delete]
            messagebox.showinfo("Sukses", f"Data {nim} berhasil dihapus.")
            refresh_data()
    else:
        messagebox.showerror("Error", "NIM tidak ditemukan.")


def admin():
    admin_win = tk.Toplevel()
    admin_win.title("Menu Admin")

    tk.Label(admin_win, text="Menu Admin", font=("Arial", 14)).pack(pady=10)
    tk.Button(admin_win, text="1. Ubah Data", width=25, command=ubah_data).pack(pady=5)
    tk.Button(admin_win, text="2. Tambah Data", width=25, command=tambah_data).pack(pady=5)
    tk.Button(admin_win, text="3. Hapus Data", width=25, command=hapus_data).pack(pady=5)

# ------------------------
# fungsi menu Mahasiswa
# ------------------------
def mahasiswa():
    mahasiswa_win = tk.Toplevel()
    mahasiswa_win.title("Menu Mahasiswa")

    tk.Label(mahasiswa_win, text = "Menu Mahasiswa").pack(pady = 10)
    tk.Button(mahasiswa_win, text = "1. Lihat data").pack(pady = 5)
    tk.Button(mahasiswa_win, text = "2. Urutkan data (Ascending/Descending)").pack(pady = 5)
    tk.Button(mahasiswa_win, text = "3. Simpan data", command=ekspor_excel).pack(pady = 5)
    

def lihat_data():
    text = ""
    for d in data_mahasiswa:
        text += f"NIM: {d['NIM']}, Nama: {d['Nama']}, Jurusan: {d['Jurusan']}\n"
    messagebox.showinfo("Data Mahasiswa", text)

def urutkan_data():
    pilihan = simpledialog.askstring("Urutkan", "Urut berdasarkan? (NIM/Nama/Jurusan)")
    for i in range()
    if pilihan and pilihan in ["NIM", "Nama", "Jurusan"]:
        messagebox.showinfo("Sukses", f"Data diurutkan berdasarkan {pilihan}.")
        refresh_data()
    else:
        messagebox.showerror("Error", "Pilihan tidak valid.")

def ekspor_excel():
    try:
        df = DataFrame(data_mahasiswa)
        df.to_excel("data_mahasiswa.xlsx", index=False)
        messagebox.showinfo("Sukses", "Data berhasil diekspor ke data_mahasiswa.xlsx")
    except Exception as e:
        messagebox.showerror("Error", f"Gagal ekspor: {str(e)}")

def inputLogin():
    user = entryUser.get()
    pw = entryPass.get()

    if user == "admin" and pw == "admin1234":
        messagebox.showinfo("Login Sukses", "Selamat datang, Admin!")
        admin()
        window.destroy()
    elif user == "mahasiswa" and pw == "mhs1234":
        messagebox.showinfo("Login Sukses", "Selamat datang, Mahasiswa!")
        mahasiswa()
        window.destroy()
    else:
        messagebox.showerror("Login Gagal", "Username atau Password salah!")

window = tk.Tk()
window.title("SISTEM MANAJEMEN DATA MAHASISWA")
window.geometry("300x200")

tk.Label(window, text="Username:").pack(pady=5)
entryUser = tk.Entry(window)
entryUser.pack(pady=5)

tk.Label(window, text="Password:").pack(pady=5)
entryPass = tk.Entry(window, show="*")
entryPass.pack(pady=5)

tk.Button(window, text="LOGIN", command=inputLogin).pack(pady=10)

window.mainloop()
