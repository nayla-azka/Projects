const books = [];
const RENDER_EVENT = 'render-shelf';
const SAVED_EVENT = 'saved-shelf';
const STORAGE_KEY = 'BOOKSHELF-APPS';
let editingBookId = null;


function saveData() {
    if (checkStorage()) {
        const parsed = JSON.stringify(books);
        localStorage.setItem(STORAGE_KEY, parsed);
        document.dispatchEvent(new Event(SAVED_EVENT));
    }
}

function generateID() {
    return +new Date();
}

function checkStorage() {
    if (typeof(Storage) === 'undefined') {
        alert('Your browser does not support local storage');
        return false;
    }
    return true;
}

function generateBookObj(id, title, author, year, isComplete) {
    return {
        id,
        title,
        author,
        year, 
        isComplete
    };
}

function loadData() {
    const serializedData = localStorage.getItem(STORAGE_KEY);
    let data = JSON.parse(serializedData);

    if (data !== null) {
        for (const book of data) {
            book.year = parseInt(book.year);
            books.push(book);
        }
    }

    document.dispatchEvent(new Event(RENDER_EVENT));
}

document.addEventListener('DOMContentLoaded', function () {
    const isCompleteCheckbox = document.getElementById('bookFormIsComplete');
    const isCompleteText = document.getElementById('isCompleteText');

    isCompleteCheckbox.addEventListener('change', function () {
        isCompleteText.innerText = isCompleteCheckbox.checked ? "selesai dibaca" : "belum selesai dibaca";
    });

    const submitForm = document.getElementById('bookForm');
    submitForm.addEventListener('submit', function (event) {
        event.preventDefault();
        addBook();
    });

    if (checkStorage()) {
        loadData();
    }
});

function togglePopup(visible) {
    const popup = document.getElementById("popup");
    const main = document.getElementById('main');
    if (visible) {
        popup.hidden = false;
        main.classList.add("blurred");
    } else {
        popup.hidden = true;
        main.classList.remove("blurred");
    }
}

document.addEventListener(SAVED_EVENT, function () {
    togglePopup(true);
});

window.addEventListener("click", function (event) {
    const popup = document.getElementById("popup");
    if (!popup.hidden && !popup.contains(event.target)) {
        const submitForm = document.getElementById('bookForm');
        submitForm.removeAttribute('data-editing');
        const submitButton = document.getElementById('bookFormSubmit');
        submitButton.removeAttribute('hidden');
        const header = document.getElementById('header');
        header.removeAttribute('hidden');
        const submitButtonEdit = document.getElementById('bookFormSubmitEdit');
        submitButtonEdit.setAttribute('hidden', true);
        const headerEdit = document.getElementById('headerEdit');
        headerEdit.setAttribute('hidden', true);
        togglePopup(false);
    }
});

document.addEventListener(RENDER_EVENT, function () {
    const incompleteBook = document.getElementById('incompleteBookList');
    incompleteBook.innerHTML = '';

    const completeBook = document.getElementById('completeBookList');
    completeBook.innerHTML = '';

    for (const book of books) {
        const bookElement = createBook(book);
        if (!book.isComplete) {
            incompleteBook.append(bookElement);
        } else {
            completeBook.append(bookElement);
        }
    }
});

function findBook(bookId) {
    for(const book of books) {
        if(book.id === bookId) {
            return book;
        }
    }
    return null;
}

function findBookIndex(bookId) {
    for(const i in books) {
        if(books[i].id === bookId){
            return i;
        }
    }
    return -1;
}

function createBook(bookObj) {
    const buttonIsComplete = document.createElement('button');
    buttonIsComplete.innerText = bookObj.isComplete ? "belum selesai dibaca" : "selesai dibaca";
    buttonIsComplete.setAttribute('data-testid', 'bookItemIsCompleteButton');
    buttonIsComplete.addEventListener('click', function () {
        toggleBookCompletion(bookObj.id);
    });

    const buttonDelete = document.createElement('button');
    buttonDelete.innerText = "Hapus Buku";
    buttonDelete.setAttribute('data-testid', 'bookItemDeleteButton');
    buttonDelete.addEventListener('click', function () {
        deleteBook(bookObj.id);
    });

    const buttonEdit = document.createElement('button');
    buttonEdit.innerText = "Edit Buku";
    buttonEdit.setAttribute('data-testid', 'bookItemEditButton');
    buttonEdit.addEventListener('click', function () {
        editBook(bookObj.id);
    });

    const buttonContainer = document.createElement('div');
    buttonContainer.append(buttonIsComplete, buttonDelete, buttonEdit);

    const title = document.createElement('h3');
    title.innerText = bookObj.title;
    title.setAttribute('data-testid', 'bookItemTitle');

    const author = document.createElement('p');
    author.innerText = `Penulis: ${bookObj.author}`;
    author.setAttribute('data-testid', 'bookItemAuthor');

    const year = document.createElement('p');
    year.innerText = `Tahun: ${bookObj.year}`;
    year.setAttribute('data-testid', 'bookItemYear');

    const container = document.createElement('div');
    container.classList.add('book-item');
    container.setAttribute('data-bookid', bookObj.id);
    container.setAttribute('data-testid', 'bookItem');
    container.append(title, author, year, buttonContainer);

    return container;
}

function addBook() {
    const titleInput = document.getElementById('bookFormTitle');
    const authorInput = document.getElementById('bookFormAuthor');
    const yearInput = document.getElementById('bookFormYear');
    const isCompleteCheckbox = document.getElementById('bookFormIsComplete');
 
    const title = titleInput.value;
    const author = authorInput.value;
    const year = yearInput.value;
    const isComplete = isCompleteCheckbox.checked;

    let bookId = null;

    if (editingBookId !== null) {
        const book = findBook(editingBookId);
        if (book) {
            book.title = title;
            book.author = author;
            book.year = parseInt(year);
            book.isComplete = isComplete;
            bookId = book.id;
        }

        editingBookId = null;
    } else {
        const generatedID = generateID();
        const parsedYear = parseInt(year);
        const newBook = generateBookObj ( generatedID, title, author, parsedYear, isComplete );
        books.push(newBook);
        bookId = newBook.id;
    }

    document.dispatchEvent(new Event(RENDER_EVENT));
    saveData();

    titleInput.value = '';
    authorInput.value = '';
    yearInput.value = '';
    isCompleteCheckbox.checked = false;

    const bookElement = document.querySelector(`[data-bookid="${bookId}"]`);
    bookElement.scrollIntoView({ behavior: 'smooth' });
}

function toggleBookCompletion(bookId) {
    const book = findBook(bookId);
    if (book) {
        book.isComplete = !book.isComplete;

        const bookElement = document.querySelector(`[data-bookid="${bookId}"]`);
        if (bookElement) {
            const completionText = bookElement.querySelector('#isCompleteText');
            if (completionText) {
                completionText.innerText = book.isComplete ? "selesai dibaca" : "belum selesai dibaca";
            }
        }

        document.dispatchEvent(new Event(RENDER_EVENT));
        saveData();
    }
}

function deleteBook(bookId) {
    const bookIndex = findBookIndex(bookId);
    if (bookIndex !== -1) {
        books.splice(bookIndex, 1);
        document.dispatchEvent(new Event(RENDER_EVENT));
        saveData();
    }
}

function editBook(bookId) {
    const book = findBook(bookId);
    if (book) {
        const title = document.getElementById('bookFormTitle');
        const author = document.getElementById('bookFormAuthor');
        const year = document.getElementById('bookFormYear');
        const isComplete = document.getElementById('bookFormIsComplete');

        title.value = book.title;
        author.value = book.author;
        year.value = parseInt(book.year);
        isComplete.checked = book.isComplete;

        const submitForm = document.getElementById('bookForm');
        submitForm.setAttribute('data-editing', bookId);
        const submitButton = document.getElementById('bookFormSubmit');
        submitButton.setAttribute('hidden', true);
        const header = document.getElementById('header');
        header.setAttribute('hidden', true);
        const submitButtonEdit = document.getElementById('bookFormSubmitEdit');
        submitButtonEdit.removeAttribute('hidden');
        const headerEdit = document.getElementById('headerEdit');
        headerEdit.removeAttribute('hidden');
        editingBookId = bookId;

        
        document.getElementById('bookForm').scrollIntoView({ behavior: 'smooth' });
    }
}

document.getElementById('searchBook').addEventListener('submit', function (event) {
    event.preventDefault();

    const searchKey = document.getElementById('searchBookTitle').value.toLowerCase();
    const incompleteBookList = document.getElementById('incompleteBookList');
    const completeBookList = document.getElementById('completeBookList');

    incompleteBookList.innerHTML = '';
    completeBookList.innerHTML = '';

    for (const book of books) {
        if (book.title.toLowerCase().includes(searchKey)) {
            const bookElement = createBook(book);
            if (book.isComplete) {
                completeBookList.append(bookElement);
                completeBookList.scrollIntoView({ behavior: 'smooth' });
            } else {
                incompleteBookList.append(bookElement);
                incompleteBookList.scrollIntoView({ behavior: 'smooth' });
            }
        }
    }
});