const express = require("express");
const path = require("path");
const sqlite3 = require("sqlite3").verbose();

const app = express();
const PORT = 3000;

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

const dbPath = path.join(__dirname, "pengeluaran.db");
const db = new sqlite3.Database(dbPath);

db.serialize(() => {
  db.run(
    `CREATE TABLE IF NOT EXISTS expenses (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      tanggal TEXT NOT NULL,
      deskripsi TEXT NOT NULL,
      tipe TEXT NOT NULL,
      jumlah REAL NOT NULL
    )`
  );
});

app.use(express.static(path.join(__dirname, "public")));

app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "public", "home.html"));
});

app.get("/api/expenses", (req, res) => {
  db.all("SELECT * FROM expenses ORDER BY id DESC", (err, rows) => {
    if (err) {
      console.error(err);
      return res.status(500).json({ message: "Gagal mengambil data pengeluaran" });
    }
    res.json(rows);
  });
});

app.get("/api/expenses/:id", (req, res) => {
  const id = Number(req.params.id);
  db.get("SELECT * FROM expenses WHERE id = ?", [id], (err, row) => {
    if (err) {
      console.error(err);
      return res.status(500).json({ message: "Gagal mengambil data pengeluaran" });
    }
    if (!row) {
      return res.status(404).json({ message: "Pengeluaran tidak ditemukan" });
    }
    res.json(row);
  });
});

app.post("/api/expenses", (req, res) => {
  const { tanggal, deskripsi, tipe, jumlah } = req.body;
  if (!tanggal || !deskripsi || !tipe || !jumlah) {
    return res.status(400).json({ message: "Data tidak lengkap" });
  }

  const stmt =
    "INSERT INTO expenses (tanggal, deskripsi, tipe, jumlah) VALUES (?, ?, ?, ?)";
  db.run(stmt, [tanggal, deskripsi, tipe, Number(jumlah)], function (err) {
    if (err) {
      console.error(err);
      return res.status(500).json({ message: "Gagal menambahkan pengeluaran" });
    }
    const created = {
      id: this.lastID,
      tanggal,
      deskripsi,
      tipe,
      jumlah: Number(jumlah),
    };
    res.status(201).json(created);
  });
});

app.put("/api/expenses/:id", (req, res) => {
  const id = Number(req.params.id);
  const { tanggal, deskripsi, tipe, jumlah } = req.body;

  db.get("SELECT * FROM expenses WHERE id = ?", [id], (err, row) => {
    if (err) {
      console.error(err);
      return res.status(500).json({ message: "Gagal mengambil data pengeluaran" });
    }
    if (!row) {
      return res.status(404).json({ message: "Pengeluaran tidak ditemukan" });
    }

    const newTanggal = tanggal ?? row.tanggal;
    const newDeskripsi = deskripsi ?? row.deskripsi;
    const newTipe = tipe ?? row.tipe;
    const newJumlah = jumlah !== undefined ? Number(jumlah) : row.jumlah;

    const stmt =
      "UPDATE expenses SET tanggal = ?, deskripsi = ?, tipe = ?, jumlah = ? WHERE id = ?";
    db.run(
      stmt,
      [newTanggal, newDeskripsi, newTipe, newJumlah, id],
      function (updateErr) {
        if (updateErr) {
          console.error(updateErr);
          return res.status(500).json({ message: "Gagal mengubah pengeluaran" });
        }
        res.json({
          id,
          tanggal: newTanggal,
          deskripsi: newDeskripsi,
          tipe: newTipe,
          jumlah: newJumlah,
        });
      }
    );
  });
});

app.delete("/api/expenses/:id", (req, res) => {
  const id = Number(req.params.id);
  const stmt = "DELETE FROM expenses WHERE id = ?";
  db.run(stmt, [id], function (err) {
    if (err) {
      console.error(err);
      return res.status(500).json({ message: "Gagal menghapus pengeluaran" });
    }
    if (this.changes === 0) {
      return res.status(404).json({ message: "Pengeluaran tidak ditemukan" });
    }
    res.status(204).send();
  });
});

app.listen(PORT, () => {
  console.log(`Server berjalan di http://localhost:${PORT}`);
});