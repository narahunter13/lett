import DataTable from 'datatables.net-dt';
import 'datatables.net-dt/css/jquery.dataTables.min.css'
import 'datatables.net-responsive-dt';
import 'datatables.net-searchpanes-dt/css/searchPanes.dataTables.min.css';

let suratMasukTable = new DataTable('#surat-masuk', {
    responsive: true,
    searching: true
});

let suratKeluarTable = new DataTable('#surat-keluar', {
    responsive: true,
    searching: true
});