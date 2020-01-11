function closeCourseForm() {
    document.getElementById("CourseForm").style.display = "none";
}

function openCourseForm() {
    document.getElementById("CourseForm").style.display = "block";
}

function closeOppForm() {
    document.getElementById("OppForm").style.display = "none";
}

function openOppForm() {
    document.getElementById("OppForm").style.display = "block";
}

function submitOpp() {

    var name = $("input[name='recruiterName']").val();
    var company = document.getElementById("companyname").value;
    var email = $("input[name='emailaddress']").val();
    
    var position = document.getElementById("position").value;
    var jobtype = $("input[name='jobType']:checked").val();
    var description = document.getElementById("jobdestxt").value;
    var joblink = document.getElementById("joblink").value;

    var datamap = {
        'name1': name,
        'companyName1': company,
        'email1': email,
        'position1': position,
        'jobType1': jobtype,
        'jobDescription1': description,
        'joblink1': joblink
    };
    var datastring = JSON.stringify(datamap);

    $.ajax({
        type: "POST",
        url: "submitOpp.php",
        data: {data: datastring},
        success: function (data) {
            alert("Passing data to the server...");
        }
    });
    alert("Form submitted successfully.");
}

function submitCourse() {


    //course
    var crn = document.getElementById("crn").value;
    var courseName = document.getElementById("courseName").value;
    var profName = document.getElementById("profName").value;
    var courseDesc = document.getElementById("courseDesc").value;
    var prereq = document.getElementById("prereq").value;
    var link = document.getElementById("link").value;

    var datamap = {
        'crn1': crn,
        'courseName1': courseName,
        'profName1': profName,
        'courseDesc1': courseDesc,
        'prereq1': prereq,
        'link1': link
    };
    var datastring = JSON.stringify(datamap);

    $.ajax({
        type: "POST",
        url: "submitCourse.php",
        data: { data: datastring },
        async: true,
        success: function (data) {
            alert(data);
        }
    });
}

function login() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var validator = 0;
    var datamap = {
        'username1': username,
        'password1': password
    };
    var datastring = JSON.stringify(datamap);

    $.ajax({
        type: "POST",
        url: "login.php",
        async: false,
        data: { data: datastring },
        success: function (data) {
            if (data == "success") {
                alert("Login successful!");
                validator = 1;
            }
            else {
                alert("Invalid username or password.");
            }
                
        },
        error: function () {
            alert("ajax failed.");
        }
    });
    if (validator == 0)
        return false;
}

function createTable(aArray) {
    var table = document.createElement('table');
    var tableBody = document.createElement('tbody');

    aArray.forEach(function (rowData) {
        var row = document.createElement('tr');

        rowData.forEach(function (cellData) {
            var cell = document.createElement('td');
            cell.appendChild(document.createTextNode(cellData));
            row.appendChild(cell);
        });

        tableBody.appendChild(row);
    });

    table.appendChild(tableBody);
    document.body.appendChild(table);
}


