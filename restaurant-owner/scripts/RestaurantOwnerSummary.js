const dailyEarnings = {
  'day-1': 56,
  'day-2': 200,
  'day-3': 130,
};

function init() {
  dailyEarningsChart();
}

function dailyEarningsChart() {
  for (earnings in dailyEarnings) {
    document.getElementById(earnings).style['height'] = dailyEarnings[earnings].toString().concat('px');
  }
}
