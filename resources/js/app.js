import './bootstrap';
import data from './init-alpine.js'

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import '../../vendor/rappasoft/laravel-livewire-tables/resources/imports/laravel-livewire-tables.js';
 
Alpine.data('data', data)
 
Livewire.start()