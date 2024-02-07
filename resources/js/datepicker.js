
function app() {
    const MONTH_NAMES = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    const DAYS = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    return {
        showDatepicker: false,
        datepickerValue: '',
        DAYS: DAYS,
        MONTH_NAMES: MONTH_NAMES,
        month: '',
        year: '',
        no_of_days: [],
        blankdays: [],
        days: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],

        initDate() {
            let today = new Date();
            let date = today.getDate() < 10 ? '0' + String(today.getDate()) : today.getDate()
            let month = today.getMonth() + 1 < 10 ? '0' + String(today.getMonth() + 1) : today.getMonth() + 1

            this.month = today.getMonth();
            this.year = today.getFullYear();
            this.datepickerValue = `${date}-${month}-${this.year}`;
        },

        isToday(date) {
            const today = new Date();
            const d = new Date(this.year, this.month, date);

            return today.toDateString() === d.toDateString() ? true : false;
        },

        getDateValue(date) {
            let selectedDate = new Date(this.year, this.month, date);
            let date_ = selectedDate.getDate() < 10 ? '0' + String(selectedDate.getDate()) : selectedDate.getDate()
            let month = selectedDate.getMonth() + 1 < 10 ? '0' + String(selectedDate.getMonth() + 1) : selectedDate.getMonth() + 1

            this.datepickerValue = `${date_}-${month}-${selectedDate.getFullYear()}`;

            this.$refs.date.value = `${date_}-${month}-${selectedDate.getFullYear()}`;

            console.log(this.$refs.date.value);

            this.showDatepicker = false;
        },

        getNoOfDays() {
            let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

            // find where to start calendar day of week
            let dayOfWeek = new Date(this.year, this.month).getDay();
            let blankdaysArray = [];
            for (var i = 1; i <= dayOfWeek; i++) {
                blankdaysArray.push(i);
            }

            let daysArray = [];
            for (var i = 1; i <= daysInMonth; i++) {
                daysArray.push(i);
            }

            this.blankdays = blankdaysArray;
            this.no_of_days = daysArray;
        }
    }
}

export default app;