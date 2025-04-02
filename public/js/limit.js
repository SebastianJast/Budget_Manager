const categorySelect = document.querySelector("#category-select-expense");
const dateSelect = document.querySelector("#date-input-expense");
const amount = document.querySelector("#floating-input-expense");

// Limit value

categorySelect.addEventListener("change", limitValue);
dateSelect.addEventListener("change", limitValue);

function limitValue() {
  const category = categorySelect.value;
  const month = dateSelect.value.substr(5, 2);

  const sumExpensesByMonthAndCategory = async () => {
    try {
      const res = await fetch(`../api/expenses/${category}/${month}`);
      const data = await res.json();
      console.log(data.expensesSUM);
      const expensesSUM = data.expensesSUM
        ? "Wydałeś " + data.expensesSUM + " zł w tym miesiącu na tą kategorię"
        : "Nie wydałeś żadnych pieniędzy na tą kategorię w tym miesiącu!";
      const limitValue = document.querySelector("#limit-value");
      limitValue.innerHTML = expensesSUM;
      limitValue.style.color = "orange";
    } catch (e) {
      console.log("ERROR", e);
    }
  };

  sumExpensesByMonthAndCategory();
}

// Limit info, Cash left

categorySelect.addEventListener("change", limitInfo);
amount.addEventListener("input", limitInfo);

function limitInfo() {
  const category = categorySelect.value;

  const limitCategory = async () => {
    try {
      const res = await fetch(`../api/limit/${category}`);
      const data = await res.json();
      console.log(data.limits);
      const limit = data.limits
        ? "Limit dla wybranej kategorii wynosi: " + data.limits + " zł"
        : "Wybrana kategoria nie ma ustawionego limitu";
      const limitInfo = document.querySelector("#limit-info");
      limitInfo.style.color = "orange";
      limitInfo.innerHTML = limit;
      const cashLeftInfo = document.querySelector("#cash-left");
      const cashLeft = data.limits - amount.value;
      cashLeftInfo.style.color = cashLeft < 0 ? "red" : "green";
      cashLeftInfo.innerHTML = "Pozostały limit: " + cashLeft + "zł";
    } catch (e) {
      console.log("ERROR", e);
    }
  };

  limitCategory();
}
