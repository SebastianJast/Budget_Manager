// Limit value

const categorySelect = document.querySelector("#category-select-expense");
const dateSelect = document.querySelector("#date-input-expense");

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
    } catch (e) {
      console.log("ERROR", e);
    }
  };

  sumExpensesByMonthAndCategory();
}

// Limit info

categorySelect.addEventListener("change", limitInfo);

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
      limitInfo.innerHTML = limit;
    } catch (e) {
      console.log("ERROR", e);
    }
  };

  limitCategory();
}
