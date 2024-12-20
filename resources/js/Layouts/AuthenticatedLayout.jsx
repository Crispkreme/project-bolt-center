import Header from '@/Components/Header';
import { Link, usePage } from '@inertiajs/react';
import React, { useState } from 'react';
import { HiMenuAlt3 } from "react-icons/hi";
import { RiHomeWifiLine } from "react-icons/ri";
import { TbUsersGroup } from "react-icons/tb";
import { FiClipboard } from "react-icons/fi";

export default function AuthenticatedLayout({ header, children }) {
    const user = usePage().props.auth.user;
    const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false);

    const menus = [
        { type: "link", name: "Dashboard", link: '/dashboard', icon: RiHomeWifiLine },
        { type: "divider" },
        { type: "label", name: "Management" },
        { type: "link", name: "Employee", link: '/all/employee', icon: TbUsersGroup },
        { type: "link", name: "Inventory", link: '/inventory', icon: FiClipboard },
        { type: "link", name: "Stocks", link: '/stocks', icon: FiClipboard },
        { type: "divider" },
        { type: "label", name: "Reports" },
        { type: "link", name: "Daily Expenses", link: '/daily-expenses', icon: FiClipboard },
        { type: "link", name: "Sales", link: '/sales', icon: FiClipboard },
    ];

    const [open, setOpen] = useState(true);

    return (
        <section className="flex gap-1">
            <div className={`bg-[#0e0e0e] min-h-screen ${open ? 'w-72' : 'w-16'} duration-500 text-gray-100 px-4`}>
                <div className="py-3 flex justify-end">
                    <HiMenuAlt3 size={26} className="cursor-pointer" onClick={() => setOpen(!open)} />
                </div>
                <div className="mt-4 flex flex-col gap-4">
                    {menus.map((menu, i) => {
                        if (menu.type === "divider") {
                            return <div key={i} className="mt-1"></div>;
                        }

                        if (menu.type === "label") {
                            return (
                                <div key={i} className="text-xs font-semibold uppercase text-gray-400 pl-2">
                                    {menu.name}
                                </div>
                            );
                        }

                        return (
                            <Link
                                href={menu.link} // Use 'href' instead of 'to' for Inertia links
                                key={i}
                                className={`group flex items-center text-sm gap-3.5 font-medium p-2 hover:bg-gray-800 rounded-md`}
                            >
                                <div>{React.createElement(menu.icon, { size: "20" })}</div>
                                <h2
                                    style={{ transitionDelay: `${i + 3}00ms` }}
                                    className={`whitespace-pre duration-500 ${!open && 'opacity-0 translate-x-28 overflow-hidden'}`}
                                >
                                    {menu.name}
                                </h2>
                                <h2
                                    className={`${open && 'hidden'} absolute left-48 bg-white font-semibold whitespace-pre text-gray-900 rounded-md drop-shadow-lg px-0 py-0 w-0 overflow-hidden group-hover:px-2 group-hover:py-1 group-hover:left-14 group-hover:duration-300 group-hover:w-fit`}
                                >
                                    {menu.name}
                                </h2>
                            </Link>
                        );
                    })}
                </div>
            </div>
            <div className="m-3 text-xl text-gray-900 font-semibold w-full">
                <Header />
                <main>{children}</main>
            </div>
        </section>
    );
}
