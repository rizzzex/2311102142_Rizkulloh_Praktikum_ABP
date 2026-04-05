$(document).ready(function() {
    // 1. Initialize DataTable
    let table = $('#studentTable').DataTable({
        ajax: '/api/students',
        columns: [
            { data: 'nim' },
            { data: 'nama' },
            { data: 'email' },
            { data: 'jurusan' },
            {
                data: 'id',
                orderable: false,
                className: 'text-center',
                render: function(data) {
                    return `
                        <div class="btn-group" role="group">
                            <button class="btn btn-sm btn-outline-info rounded-pill px-3 me-2 edit-btn" data-id="${data}">
                                <i class="fas fa-edit me-1"></i> Edit
                            </button>
                            <button class="btn btn-sm btn-outline-danger rounded-pill px-3 delete-btn" data-id="${data}">
                                <i class="fas fa-trash me-1"></i> Hapus
                            </button>
                        </div>
                    `;
                }
            }
        ],
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            paginate: {
                previous: "Sebelumnya",
                next: "Selanjutnya"
            },
            emptyTable: "Belum ada data mahasiswa."
        }
    });

    // 2. Handle Create Student (Form Submission)
    $('#studentForm').on('submit', function(e) {
        e.preventDefault();
        let formData = {
            nim: $('#nim').val(),
            nama: $('#nama').val(),
            email: $('#email').val(),
            jurusan: $('#jurusan').val()
        };

        $.ajax({
            url: '/api/students',
            method: 'POST',
            data: formData,
            success: function(resp) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data mahasiswa telah disimpan.',
                    background: '#1e293b',
                    color: '#fff',
                    confirmButtonColor: '#9d50bb'
                }).then(() => {
                    window.location.href = '/table';
                });
            },
            error: function(err) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Gagal menyimpan data.',
                    background: '#1e293b',
                    color: '#fff'
                });
            }
        });
    });

    // 3. Handle Edit Button Click (Open Modal)
    $('#studentTable').on('click', '.edit-btn', function() {
        let id = $(this).data('id');
        $.get(`/api/students/${id}`, function(student) {
            $('#editId').val(student.id);
            $('#editNim').val(student.nim);
            $('#editNama').val(student.nama);
            $('#editEmail').val(student.email);
            $('#editJurusan').val(student.jurusan);
            $('#editModal').modal('show');
        });
    });

    // 4. Handle Edit Form Submission
    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        let id = $('#editId').val();
        let formData = {
            nim: $('#editNim').val(),
            nama: $('#editNama').val(),
            email: $('#editEmail').val(),
            jurusan: $('#editJurusan').val()
        };

        $.ajax({
            url: `/api/students/${id}`,
            method: 'PUT',
            data: formData,
            success: function(resp) {
                $('#editModal').modal('hide');
                table.ajax.reload();
                Swal.fire({
                    icon: 'success',
                    title: 'Terupdate!',
                    text: 'Data mahasiswa berhasil diperbarui.',
                    background: '#1e293b',
                    color: '#fff',
                    timer: 2000,
                    showConfirmButton: false
                });
            },
            error: function(err) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Gagal memperbarui data.',
                    background: '#1e293b',
                    color: '#fff'
                });
            }
        });
    });

    // 5. Handle Delete Button Click
    $('#studentTable').on('click', '.delete-btn', function() {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#9d50bb',
            cancelButtonColor: '#ff0000',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            background: '#1e293b',
            color: '#fff'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/api/students/${id}`,
                    method: 'DELETE',
                    success: function(resp) {
                        table.ajax.reload();
                        Swal.fire({
                            title: 'Terhapus!',
                            text: 'Data mahasiswa telah dihapus.',
                            icon: 'success',
                            background: '#1e293b',
                            color: '#fff',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                });
            }
        });
    });
});
