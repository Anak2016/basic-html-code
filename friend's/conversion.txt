//Prints out the conversion to the user.
var report = function (oldMeasurement, newMeasurement) 
{
    document.getElementById("result").innerHTML =
        oldMeasurement + " = " + newMeasurement;
}

//Checks for any errors. 
//  If an error is found, returns false.
//  If an error is found, returns true.
function entryCheck(entry)
{
    if(entry.search(" ") > -1) //If more than one number were entered.
    {
        document.getElementById("result").innerHTML =
        "Error: more than on number was entered";
        return 0;               
    }
    else if(entry === "") //If there was nothing entered.
    {
        document.getElementById("result").innerHTML =
        "Error: nothing was entered";
        return 0;        
    }
    else if((isNaN(entry)) == 1) //If there are no numbers.
    {
        document.getElementById("result").innerHTML =
        "Error: numbers were not entered";
        return 0;
    }
    else //If there is a number entered
    {
        return 1;
    }
}

//Converts inches to feet:
function inToFeet(i)
{
    return (i / 12) + "ft";
}

//Converts feet to yards:
function feetToYards(f)
{
    return (f / 3) + "yd";
}

//Converts inches to yards:
function inchesToYards(i)
{
    return (i / 36) + "yd";
}

//Converts feet to inches:
function feetToInches(f)
{
    return (f * 12) + "in";
}

//Converts yards to feet:
function yardsToFeet(y)
{
    return (y * 3) + "ft";
}
    
function yardsToInches(y)
{
    return (y * 36) + "in";
}    


//Converts inches to feet:
document.getElementById("in_to_ft").onclick = function () 
{
    var entry= document.getElementById("measurement").value;
    if(entryCheck(entry) == 0) //Checks for a valid entry.
    {
        return;
    }
    else
    {    
        var i = document.getElementById("measurement").value;    
        {
            var f = inToFeet(i); //Converts the measurement.
            var i = i + "in"; //Adds in to back of number.
            report(i, f);        
        }
    }
}

//Converts feet to yards:
document.getElementById("ft_to_yd").onclick = function () 
{
    var entry= document.getElementById("measurement").value;
    if(entryCheck(entry) == 0) //Checks for a valid entry.
    {
        return;
    }
    else
    {
        var f = document.getElementById("measurement").value;
        {
            var y = feetToYards(f); //Converts the measurement.
            var f = f + "ft"; //Adds in to back of number.
            report(f, y);        
        }
    }
}

//Converts inches to yards:
document.getElementById("in_to_yd").onclick = function () 
{
    var entry= document.getElementById("measurement").value;
    if(entryCheck(entry) == 0) //Checks for a valid entry.
    {
        return;
    }
    else
    {
        var i = document.getElementById("measurement").value;
        {
            var y = inchesToYards(i); //Converts the measurement.
            var i = i + "in"; //Adds in to back of number.
            report(i, y);        
        }
    }
}

//Converts feet to inches:
document.getElementById("ft_to_in").onclick = function () 
{
    var entry= document.getElementById("measurement").value;
    if(entryCheck(entry) == 0) //Checks for a valid entry.
    {
        return;
    }
    else    
    {
        var f = document.getElementById("measurement").value;
        {
            var i = feetToInches(f); //Converts the measurement.
            var f = f + "ft"; //Adds in to back of number.
            report(f, i);        
        }
    }
}

//Converts yards to feet:
document.getElementById("yd_to_ft").onclick = function () 
{
    var entry= document.getElementById("measurement").value;
    if(entryCheck(entry) == 0) //Checks for a valid entry.
    {
        return;
    }
    else
    {
        var y = document.getElementById("measurement").value;
        {
            var f = yardsToFeet(y); //Converts the measurement.
            var y = y + "yd"; //Adds in to back of number.
            report(y, f);        
        }
    }
}

//Converts yards to inches:
document.getElementById("yd_to_in").onclick = function () 
{
    var entry= document.getElementById("measurement").value;
    if(entryCheck(entry) == 0) //Checks for a valid entry.
    {
        return;
    }
    else
    {
        var y = document.getElementById("measurement").value;
        {
            var i = yardsToInches(y); //Converts the measurement.
            var y = y + "yd"; //Adds in to back of number.
            report(y, i);        
        }
    }
}