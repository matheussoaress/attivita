$(document).ready(function () {
    var x = [
    [
      "Tiger Nixon",
      "System Architect",
      "Edinburgh",
      "5421"
    ],
    [
      "Garrett Winters",
      "Accountant",
      "Tokyo",
      "8422"
    ],
    [
      "Ashton Cox",
      "Junior Technical Author",
      "San Francisco",
      "1562"
    ],
    [
      "Cedric Kelly",
      "Senior Javascript Developer",
      "Edinburgh",
      "6224"
    ],
    [
      "Airi Satou",
      "Accountant",
      "Tokyo",
      "5407"
    ],
    [
      "Brielle Williamson",
      "Integration Specialist",
      "New York",
      "4804"
    ],
    [
      "Herrod Chandler",
      "Sales Assistant",
      "San Francisco",
      "9608"
    ],
    [
      "Rhona Davidson",
      "Integration Specialist",
      "Tokyo",
      "6200"
    ],
    [
      "Colleen Hurst",
      "Javascript Developer",
      "San Francisco",
      "2360"
    ],
    [
      "Sonya Frost",
      "Software Engineer",
      "Edinburgh",
      "1667"
    ],
    [
      "Jena Gaines",
      "Office Manager",
      "London",
      "3814"
    ],
    [
      "Quinn Flynn",
      "Support Lead",
      "Edinburgh",
      "9497"
    ],
    [
      "Charde Marshall",
      "Regional Director",
      "San Francisco",
      "6741"
    ],
    [
      "Haley Kennedy",
      "Senior Marketing Designer",
      "London",
      "3597"
    ],
    [
      "Tatyana Fitzpatrick",
      "Regional Director",
      "London",
      "1965"
    ],
    [
      "Michael Silva",
      "Marketing Designer",
      "London",
      "1581"
    ],
    [
      "Paul Byrd",
      "Chief Financial Officer (CFO)",
      "New York",
      "3059"
    ],
    [
      "Gloria Little",
      "Systems Administrator",
      "New York",
      "1721"
    ],
    [
      "Bradley Greer",
      "Software Engineer",
      "London",
      "2558"
    ],
    [
      "Dai Rios",
      "Personnel Lead",
      "Edinburgh",
      "2290"
    ],
    [
      "Jenette Caldwell",
      "Development Lead",
      "New York",
      "1937"
    ],
    [
      "Yuri Berry",
      "Chief Marketing Officer (CMO)",
      "New York",
      "6154"
    ],
    [
      "Caesar Vance",
      "Pre-Sales Support",
      "New York",
      "8330"
    ],
    [
      "Doris Wilder",
      "Sales Assistant",
      "Sidney",
      "3023"
    ],
    [
      "Angelica Ramos",
      "Chief Executive Officer (CEO)",
      "London",
      "5797"
    ],
    [
      "Gavin Joyce",
      "Developer",
      "Edinburgh",
      "8822"
    ],
    [
      "Jennifer Chang",
      "Regional Director",
      "Singapore",
      "9239"
    ],
    [
      "Brenden Wagner",
      "Software Engineer",
      "San Francisco",
      "1314"
    ],
    [
      "Fiona Green",
      "Chief Operating Officer (COO)",
      "San Francisco",
      "2947"
    ],
    [
      "Shou Itou",
      "Regional Marketing",
      "Tokyo",
      "8899"
    ],
    [
      "Michelle House",
      "Integration Specialist",
      "Sidney",
      "2769"
    ],
    [
      "Suki Burks",
      "Developer",
      "London",
      "6832"
    ],
    [
      "Prescott Bartlett",
      "Technical Author",
      "London",
      "3606"
    ],
    [
      "Gavin Cortez",
      "Team Leader",
      "San Francisco",
      "2860"
    ],
    [
      "Martena Mccray",
      "Post-Sales support",
      "Edinburgh",
      "8240"
    ],
    [
      "Unity Butler",
      "Marketing Designer",
      "San Francisco",
      "5384"
    ],
    [
      "Howard Hatfield",
      "Office Manager",
      "San Francisco",
      "7031"
    ],
    [
      "Hope Fuentes",
      "Secretary",
      "San Francisco",
      "6318"
    ],
    [
      "Vivian Harrell",
      "Financial Controller",
      "San Francisco",
      "9422"
    ],
    [
      "Timothy Mooney",
      "Office Manager",
      "London",
      "7580"
    ],
    [
      "Jackson Bradshaw",
      "Director",
      "New York",
      "1042"
    ],
    [
      "Olivia Liang",
      "Support Engineer",
      "Singapore",
      "2120"
    ],
    [
      "Bruno Nash",
      "Software Engineer",
      "London",
      "6222"
    ],
    [
      "Sakura Yamamoto",
      "Support Engineer",
      "Tokyo",
      "9383"
    ],
    [
      "Thor Walton",
      "Developer",
      "New York",
      "8327"
    ],
    [
      "Finn Camacho",
      "Support Engineer",
      "San Francisco",
      "2927"
    ],
    [
      "Serge Baldwin",
      "Data Coordinator",
      "Singapore",
      "8352"
    ],
    [
      "Zenaida Frank",
      "Software Engineer",
      "New York",
      "7439"
    ],
    [
      "Zorita Serrano",
      "Software Engineer",
      "San Francisco",
      "4389"
    ],
    [
      "Jennifer Acosta",
      "Junior Javascript Developer",
      "Edinburgh",
      "3431"
    ],
    [
      "Cara Stevens",
      "Sales Assistant",
      "New York",
      "3990"
    ],
    [
      "Hermione Butler",
      "Regional Director",
      "London",
      "1016"
    ],
    [
      "Lael Greer",
      "Systems Administrator",
      "London",
      "6733"
    ],
    [
      "Jonas Alexander",
      "Developer",
      "San Francisco",
      "8196"
    ],
    [
      "Shad Decker",
      "Regional Director",
      "Edinburgh",
      "6373"
    ],
    [
      "Michael Bruce",
      "Javascript Developer",
      "Singapore",
      "5384"
    ],
    [
      "Donna Snider",
      "Customer Support",
      "New York",
      "4226"
    ]
  ];
    $("#tarefas").dataTable({
        // "lengthMenu": [ 10, 25, 50, 75, 100 ],
        // "pageLength": 50,
        // "lengthChange": false,
        "data": x,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
});