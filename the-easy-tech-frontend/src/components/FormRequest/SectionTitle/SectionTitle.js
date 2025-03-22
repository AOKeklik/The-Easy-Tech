"use client"

import React, { useRef } from 'react'
import { useInView } from 'framer-motion'

const SectionTitle = () => {
    const ref = useRef(null)
    const isInView=useInView(ref,{once:true})

    return <div 
        className='heading flex max-xl:flex-col xl:items-center gap-4 justify-between'
        ref={ref}
        style={{ 
            transition:"all .7s cubic-bezier(.17,.55,.55,1) .3s",
            transform:isInView ? "translateY(0px)" : "translateY(60px)",
            opacity:isInView ? 1 : 0,
        }}
    >
        <div className='heading3'>Request a free call back.</div>
        <div className='body3 text-secondary'>Get personalized financial advice to help reach your financial goals.</div> 
    </div>
};

export default SectionTitle;