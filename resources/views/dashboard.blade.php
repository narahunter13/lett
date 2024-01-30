<x-layout>
    <x-slot:title>
        Dashboard
    </x-slot:title>
    <div class="col-lg-3 col-12">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>100</h3>

                <p>Surat Masuk</p>
            </div>
            <div class="icon">
                <i class="fas fa-inbox"></i>
            </div>
            <a href="/surat-masuk" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-12">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>100</h3>

                <p>Surat Keluar</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope-open"></i>
            </div>
            <a href="/surat-keluar" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</x-layout>