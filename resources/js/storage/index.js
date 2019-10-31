const Storege = {
    write: function (key, value) {
        localStorage.setItem(key, value);
    },
    read: function (key) {
       return  localStorage.getItem(key);
    },
    clear: function () {
        localStorage.clear();
    }
};
export default Storege
