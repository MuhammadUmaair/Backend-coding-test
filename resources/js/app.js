import React from 'react';
import { createRoot } from 'react-dom/client';
import AttendanceList from './components/AttendanceList';

if (document.getElementById('app')) {
    const root = createRoot(document.getElementById('app'));
    root.render(<AttendanceList />);
}
