'use client'

import { useEffect } from 'react'
import { useDispatch } from 'react-redux'
import { fetchSettings } from './slices/settingSlice'

export default function ClientWrapper ({ children }) {
    const dispatch = useDispatch()
    
    useEffect(() => {
            dispatch(fetchSettings())
    }, [dispatch])
    
    return children
}