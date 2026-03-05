document.addEventListener("DOMContentLoaded", function() {

    // Validating search-form
    const searchForm = document.querySelector('.search-form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            const inputUrl = searchForm.querySelector('input[name="youtube_url"]').value;
            const submitBtn = searchForm.querySelector('button');
            
            if (inputUrl.trim() === '') {
                e.preventDefault();
                alert('URL YouTube tidak boleh kosong!');
            } else if (!inputUrl.includes('youtube.com') && !inputUrl.includes('youtu.be')) {
                e.preventDefault();
                alert('Harap masukkan URL YouTube yang valid!');
            } else {
                submitBtn.innerHTML = 'Analyzing...';
                submitBtn.style.opacity = '0.7';
                submitBtn.style.cursor = 'wait';
            }
        });
    }

    // Confirm delete data (History, Keywords)
    const deleteLinks = document.querySelectorAll('.delete-text, .btn-danger');
    deleteLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            const yakin = confirm("Apakah kamu yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.");
            
            if (!yakin) {
                e.preventDefault();
            }
        });
    });

});