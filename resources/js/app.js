import './bootstrap';
import data from './init-alpine.js'

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
 
Alpine.data('data', data)
 
Livewire.start()