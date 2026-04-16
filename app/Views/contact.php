<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div style="background: #fffdf2; padding: 30px; border-radius: 12px; border: 1px solid #f9e8b3; box-shadow: 0 4px 15px rgba(230, 190, 100, 0.1);">
    
    <h2 style="border-bottom: 3px solid #ffeeba; padding-bottom: 10px; color: #856404; font-family: 'Segoe UI', Tahoma, sans-serif;">
        <?= $title; ?>
    </h2>
    
    <p style="margin: 20px 0; color: #6d644d; line-height: 1.6; font-size: 16px;">
        <?= $content; ?>
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
        <div style="padding: 20px; background: #fff; border-radius: 10px; border: 1px solid #ffeeba; box-shadow: 0 2px 5px rgba(0,0,0,0.02);">
            <h4 style="margin-top: 0; color: #856404; display: flex; align-items: center; gap: 8px;">📍 Alamat</h4>
            <p style="font-size: 14px; color: #5d543e; margin-bottom: 0;">Bekasi Regency, West Java, Indonesia</p>
        </div>
        <div style="padding: 20px; background: #fff; border-radius: 10px; border: 1px solid #ffeeba; box-shadow: 0 2px 5px rgba(0,0,0,0.02);">
            <h4 style="margin-top: 0; color: #856404; display: flex; align-items: center; gap: 8px;">📧 Kontak</h4>
            <p style="font-size: 14px; color: #5d543e; margin-bottom: 0;">
                <strong>Email:</strong> admin@adelliarzz.com<br>
                <strong>Instagram:</strong> @adelliarzz
            </p>
        </div>
    </div>

    <form style="margin-top: 40px; background: #fff; padding: 25px; border-radius: 10px; border: 1px solid #f9e8b3;">
        <h4 style="margin-top: 0; margin-bottom: 20px; color: #856404;">Kirim Pesan Langsung</h4>
        
        <div style="margin-bottom: 15px;">
            <label style="display: block; font-size: 14px; color: #856404; margin-bottom: 5px; font-weight: bold;">Nama Lengkap</label>
            <input type="text" placeholder="Masukkan nama Anda..." 
                   style="width: 100%; padding: 12px; border: 1px solid #ffeeba; border-radius: 8px; background: #fffef7; outline: none; transition: 0.3s;"
                   onfocus="this.style.borderColor='#ffd966'; this.style.boxShadow='0 0 5px rgba(255, 217, 102, 0.5)';"
                   onblur="this.style.borderColor='#ffeeba'; this.style.boxShadow='none';">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-size: 14px; color: #856404; margin-bottom: 5px; font-weight: bold;">Pesan</label>
            <textarea placeholder="Tuliskan pesan atau pertanyaan Anda di sini..." rows="5" 
                      style="width: 100%; padding: 12px; border: 1px solid #ffeeba; border-radius: 8px; background: #fffef7; outline: none; transition: 0.3s; resize: vertical;"
                      onfocus="this.style.borderColor='#ffd966'; this.style.boxShadow='0 0 5px rgba(255, 217, 102, 0.5)';"
                      onblur="this.style.borderColor='#ffeeba'; this.style.boxShadow='none';"></textarea>
        </div>

        <button type="button" 
                style="background: #856404; color: white; padding: 12px 30px; border: none; border-radius: 30px; cursor: pointer; font-weight: bold; transition: 0.3s; box-shadow: 0 4px 6px rgba(133, 100, 4, 0.2);"
                onmouseover="this.style.background='#a17a06'; this.style.transform='translateY(-2px)';"
                onmouseout="this.style.background='#856404'; this.style.transform='translateY(0)';">
            Kirim Pesan &rarr;
        </button>
    </form>
</div>
<?= $this->endSection(); ?>