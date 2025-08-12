<div x-data="secondChart()" x-init="initSecondChart()" class="w-full min-h-44 p-2.5 border border-gray-300 shadow-sm bg-white dark:border-none dark:bg-neutral-900 rounded-md">
    <canvas id="second_chart" height="177px"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

function secondChart() {
        // format date
        function format(date) {
            const months = {
                '01': 'Jan',
                '02': 'Feb',
                '03': 'Mar',
                '04': 'Apr',
                '05': 'May',
                '06': 'Jun',
                '07': 'Jul',
                '08': 'Aug',
                '09': 'Sep',
                '10': 'Oct',
                '11': 'Nov',
                '12': 'Dec',
            }
            return `${months[date.split('-')[1]]} ${date.split('-')[2]}`
        }
        return {
            chart: null,
            project_id: {{$project->id}},
            data: null,
            async initSecondChart() {
                await axios.get(`/projects/${this.project_id}/chart-data`)
                    .then(res => {
                        this.data = res.data.tasksCompleted
                    })
                    .catch(errs => console.log(errs))

                    this.chart = new Chart(
                        document.getElementById('second_chart'),
                        {
                            type: 'line',
                            data: {
                                labels: this.data.map(row => format(row.date)),
                                datasets: [{
                                    label: 'Number Of Tasks Completed Per Day',
                                    data: this.data.map(row => row.total),
                                    borderColor: 'rgb(0, 80, 239, 1)',  // Line color
                                    backgroundColor: 'rgb(0, 80, 239, 0.2)', // Fill under the line
                                    borderWidth: 2,
                                    fill: true, // This enables the fill under the line
                                    tension: 0.3, // Smooth curves (optional)
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    tooltip: {
                                        backgroundColor: '#333',
                                        titleColor: '#fff',
                                        bodyColor: '#ddd',
                                        borderWidth: 1,
                                        borderColor: '#444'
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            precision: 0,
                                        }
                                    }
                                }
                            }
                        }
                    );
            },
        }
    }

</script>