"use client"
import { usePathname } from 'next/navigation'

const useIsActive = (path) => {
    const pathname=usePathname()
        
    if (path === "/" && pathname === "/")
        return "active"

    if(pathname.slice(1).startsWith(path.slice(1)) && path !== "/")
        return"active"

    return ""
}

export default useIsActive