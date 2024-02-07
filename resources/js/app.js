import './bootstrap';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import '../../vendor/rappasoft/laravel-livewire-tables/resources/imports/laravel-livewire-tables.js';
import data from './init-alpine.js'
import app from './datepicker.js';
 
Alpine.data('data', data)
Alpine.data('datepicker', app)
 
Livewire.start()