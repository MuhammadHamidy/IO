import { Calendar } from "calendar";

function AbsoluteMonth(month) {
    if(month < 0) return Math.abs(12 - Math.abs(month % 12));
    else return month; 
}

function initCalendar(initValue) {
    const calendarElement = document.getElementById("Calendar");
    const eventElement = document.getElementById('Event');
    const monthElement = document.getElementById("Month");
    const day = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    const month = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];

    const now = new Date();

    monthElement.innerHTML = `${month[AbsoluteMonth((now.getMonth() + initValue) % 12)]} ${now.getFullYear() + Math.floor((now.getMonth() + initValue) / 12)}`;

    const cal = new Calendar();
    const calendarChild = [];

    day.forEach((value) => {
        const div = document.createElement("div");
        ["text-xs", "text-slate-800", "sm:text-[14px]", "text-[10px]"].forEach(
            (val) => div.classList.add(val)
        );
        div.innerHTML = value;
        calendarChild.push(div);
    });

    cal.monthDates((now.getFullYear()) + Math.floor((now.getMonth() + initValue) / 12), AbsoluteMonth((now.getMonth() + initValue) % 12)).forEach((rows) => {
        rows.forEach((value) => {
            const a = document.createElement("a");
            
            const matches = (evt) => {
                if (!evt) return false;
                const valueTime = value.getTime();

                if (evt.date) {
                    const d = new Date(evt.date);
                    return d.getDate() === value.getDate() && d.getMonth() === value.getMonth() && d.getFullYear() === value.getFullYear();
                }

                const start = evt.open_date ? new Date(evt.open_date) : null;
                const end = evt.close_date ? new Date(evt.close_date) : null;
                if (start && end) {
                    const startTime = new Date(start.getFullYear(), start.getMonth(), start.getDate()).getTime();
                    const endTime = new Date(end.getFullYear(), end.getMonth(), end.getDate()).getTime();
                    const mid = new Date(value.getFullYear(), value.getMonth(), value.getDate()).getTime();
                    return mid >= startTime && mid <= endTime;
                }
                if (start) {
                    return start.getDate() === value.getDate() && start.getMonth() === value.getMonth() && start.getFullYear() === value.getFullYear();
                }
                if (end) {
                    return end.getDate() === value.getDate() && end.getMonth() === value.getMonth() && end.getFullYear() === value.getFullYear();
                }
                return false;
            };

            const hasProgram = event.some((evt) => matches(evt) && evt.type === 'program');
            const hasEventOnly = event.some((evt) => matches(evt) && evt.type === 'event');
            
            if (value.getDate() === now.getDate() && value.getMonth() === now.getMonth() && value.getFullYear() === now.getFullYear())
                [
                    "text-xs",
                    "bg-purple-300",
                    "rounded-md",
                    "hover:bg-purple-300",
                    "text-purple-80",
                    "hover:text-purple-800",
                    "transition",
                    "duration-300",
                    "font-semibold",
                    "p-[8px]",
                    "sm:text-[14px]",
                    "text-[10px]",
                ].forEach((val) => a.classList.add(val));
            else if (value.getMonth() !== AbsoluteMonth((now.getMonth() + initValue) % 12))
                [
                    "text-xs",
                    "text-slate-300",
                    "hover:text-purple-800",
                    "transition",
                    "duration-300",
                    "sm:p-[8px]",
                    "sm:text-[14px]",
                    "text-[10px]",
                ].forEach((val) => a.classList.add(val));
            else if (hasProgram)
                [
                    "text-xs",
                    "text-white",
                    "bg-green-500",
                    "rounded-md",
                    "hover:bg-green-600",
                    "hover:text-white",
                    "transition",
                    "duration-300",
                    "font-semibold",
                    "p-[8px]",
                    "sm:text-[14px]",
                    "text-[10px]",
                ].forEach((val) => a.classList.add(val));
            else if (hasEventOnly)
                [
                    "text-xs",
                    "text-white",
                    "bg-blue-500",
                    "rounded-md",
                    "hover:bg-blue-600",
                    "hover:text-white",
                    "transition",
                    "duration-300",
                    "font-semibold",
                    "p-[8px]",
                    "sm:text-[14px]",
                    "text-[10px]",
                ].forEach((val) => a.classList.add(val));
            else
                [
                    "text-xs",
                    "text-black",
                    "hover:bg-purple-300",
                    "rounded-md",
                    "hover:text-purple-800",
                    "transition",
                    "duration-300",
                    "p-[8px]",
                    "sm:text-[14px]",
                    "text-[10px]",
                ].forEach((val) => a.classList.add(val));
            a.innerHTML = value.getDate();
            calendarChild.push(a);
        });
    });
    calendarElement.innerHTML = null;
    calendarChild.map(value => calendarElement.appendChild(value));

    const eventChild = [];
    event.forEach((value) => {
        const nameEvent = (value && (value.title || value.name)) || 'Event';
        const hasRange = !!(value && (value.open_date || value.close_date));
        const colorClass = (value && value.type === 'program') ? 'bg-green-500' : 'bg-blue-500';
        
        if (hasRange) {
            const start = value.open_date ? new Date(value.open_date) : null;
            const end = value.close_date ? new Date(value.close_date) : null;
            const targetYear = (now.getFullYear() + Math.floor((now.getMonth() + initValue) / 12));
            const targetMonth = AbsoluteMonth((now.getMonth() + initValue) % 12);
            // Show in list if any part of range is in the current month
            const rangeOverlapsMonth = (
                (start && start.getFullYear() === targetYear && start.getMonth() === targetMonth) ||
                (end && end.getFullYear() === targetYear && end.getMonth() === targetMonth)
            );
            if (rangeOverlapsMonth) {
                const textStart = start ? `${start.getDate()} ${month[start.getMonth()]}` : '';
                const textEnd = end ? `${end.getDate()} ${month[end.getMonth()]}` : '';
                const a = document.createElement('a');
                ["flex","items-center","gap-2","hover:text-purple-800", "transition", "duration-300"].forEach(val => a.classList.add(val));
                a.innerHTML = `<span class="inline-block w-2.5 h-2.5 rounded-full ${colorClass}"></span>${textStart}${textStart && textEnd ? ' - ' : ''}${textEnd} - ${nameEvent}`;
                eventChild.push(a);
            }
        } else if (value && value.date) {
            const nowEvent = new Date(value.date);
            if((now.getFullYear() + Math.floor((now.getMonth() + initValue) / 12)) === nowEvent.getFullYear() && AbsoluteMonth((now.getMonth() + initValue) % 12) === nowEvent.getMonth()){
                const a = document.createElement('a');
                ["flex","items-center","gap-2","hover:text-purple-800", "transition", "duration-300"].forEach(val => a.classList.add(val));
                a.innerHTML = `<span class="inline-block w-2.5 h-2.5 rounded-full ${colorClass}"></span>${nowEvent.getDate()} ${month[nowEvent.getMonth()]} - ${nameEvent}`;
                eventChild.push(a);
            }
        }
    });
    eventElement.innerHTML = null;
    eventChild.map(value => eventElement.appendChild(value));
}

let initValue = 0
const previous = document.getElementById('previous');
const next = document.getElementById('next');
const today = document.getElementById('Today');

initCalendar(initValue);

previous.addEventListener('click', () => {
    initValue--;
    initCalendar(initValue);
});

today.addEventListener('click', () => {
    initValue = 0;
    initCalendar(initValue);
})

next.addEventListener('click', () => {
    initValue++;
    initCalendar(initValue);
})