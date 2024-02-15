import './bootstrap';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import '../../vendor/rappasoft/laravel-livewire-tables/resources/imports/laravel-livewire-tables.js';
import data from './init-alpine.js'
import app from './datepicker.js';
import Swal from 'sweetalert2'

Alpine.data('data', data)
Alpine.data('datepicker', app)

window.Swal = Swal

Livewire.start()