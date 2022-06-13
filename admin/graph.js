const ctx = document.getElementById('chart').getContext('2d');

const chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Customer','Restaurant Owner', 'Rider'],
        datasets: [{
            label: '# of Votes',
            data: [3, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive:true,
    }
});