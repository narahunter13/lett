import './bootstrap';
import Alpine from 'alpinejs'
import data from './init-alpine.js'
 
window.Alpine = Alpine
Alpine.data('data', data)
Alpine.start()
