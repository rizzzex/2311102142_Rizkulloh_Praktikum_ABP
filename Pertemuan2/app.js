const express = require('express');
const bodyParser = require('body-parser');
const fs = require('fs-extra');
const path = require('path');
const { v4: uuidv4 } = require('uuid');

const app = express();
const PORT = 3000;
const DATA_FILE = path.join(__dirname, 'data', 'students.json');

// Middleware
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(path.join(__dirname, 'public')));
app.set('view engine', 'ejs');

// Ensure data file exists
if (!fs.existsSync(DATA_FILE)) {
    fs.writeJsonSync(DATA_FILE, []);
}

// Routes - Views
app.get('/', (req, res) => res.render('index', { title: 'Dashboard' }));
app.get('/form', (req, res) => res.render('form', { title: 'Tambah Mahasiswa' }));
app.get('/table', (req, res) => res.render('table', { title: 'Daftar Mahasiswa' }));

// API - CRUD
// GET All Students
app.get('/api/students', async (req, res) => {
    try {
        const students = await fs.readJson(DATA_FILE);
        res.json({ data: students }); // DataTables expects { data: [...] }
    } catch (err) {
        res.status(500).json({ error: 'Gagal memuat data' });
    }
});

// GET Single Student
app.get('/api/students/:id', async (req, res) => {
    try {
        const students = await fs.readJson(DATA_FILE);
        const student = students.find(s => s.id === req.params.id);
        if (student) res.json(student);
        else res.status(404).json({ error: 'Mahasiswa tidak ditemukan' });
    } catch (err) {
        res.status(500).json({ error: 'Gagal memuat data' });
    }
});

// POST Create Student
app.post('/api/students', async (req, res) => {
    try {
        const { nim, nama, email, jurusan } = req.body;
        const students = await fs.readJson(DATA_FILE);
        const newStudent = { id: uuidv4(), nim, nama, email, jurusan };
        students.push(newStudent);
        await fs.writeJson(DATA_FILE, students);
        res.status(201).json(newStudent);
    } catch (err) {
        res.status(500).json({ error: 'Gagal menyimpan data' });
    }
});

// PUT Update Student
app.put('/api/students/:id', async (req, res) => {
    try {
        const { nim, nama, email, jurusan } = req.body;
        let students = await fs.readJson(DATA_FILE);
        const index = students.findIndex(s => s.id === req.params.id);
        if (index !== -1) {
            students[index] = { ...students[index], nim, nama, email, jurusan };
            await fs.writeJson(DATA_FILE, students);
            res.json(students[index]);
        } else {
            res.status(404).json({ error: 'Mahasiswa tidak ditemukan' });
        }
    } catch (err) {
        res.status(500).json({ error: 'Gagal memperbarui data' });
    }
});

// DELETE Student
app.delete('/api/students/:id', async (req, res) => {
    try {
        let students = await fs.readJson(DATA_FILE);
        const filtered = students.filter(s => s.id !== req.params.id);
        await fs.writeJson(DATA_FILE, filtered);
        res.json({ success: true });
    } catch (err) {
        res.status(500).json({ error: 'Gagal menghapus data' });
    }
});

app.listen(PORT, () => {
    console.log(`Server running at http://localhost:${PORT}`);
});
