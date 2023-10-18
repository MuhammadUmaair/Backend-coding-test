import React, { useEffect, useState } from "react";
import axios from "axios";

function AttendanceList() {
    const [attendanceInformation, setAttendanceInformation] = useState([]);

    useEffect(() => {
        // Parse the JSON data received from the JavaScript variable
        const parsedData = JSON.parse(attendanceData);

        setAttendanceInformation(parsedData);
    }, []);

    return (
        <div className="attendance-container">
            <table className="attendance-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Total Working Hours</th>
                    </tr>
                </thead>
                <tbody>
                    {attendanceInformation.map((item, index) => (
                        <tr key={index}>
                            <td>{item.name}</td>
                            <td className="check-in">{item.check_in}</td>
                            <td className="check-out">{item.check_out}</td>
                            <td className="total-working-hours">{item.total_working_hours}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}

export default AttendanceList;
