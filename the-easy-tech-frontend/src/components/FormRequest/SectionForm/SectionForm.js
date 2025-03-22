"use client"

import React, { useRef } from 'react'
import { useInView } from 'framer-motion'
import * as Icon from '@phosphor-icons/react/dist/ssr'

const SectionForm = () => {
    const ref = useRef(null)
    const isInView=useInView(ref,{once:true})
    
    return <form 
        className='form md:mt-10 mt-6 flex max-lg:flex-col lg:items-center justify-between gap-8 pb-14 border-b border-line'
        ref={ref}
        style={{ 
            transition:"all .7s cubic-bezier(.17,.55,.55,1) .3s",
            transform:isInView ? "translateY(0px)" : "translateY(60px)",
            opacity:isInView ? 1 : 0,
        }}
    >
        <div className='grid lg:grid-cols-3 gap-6 w-full'>
            <div className='w-full'>
                <input className='body3 md:py-[14px] py-3 px-5 bg-surface rounded-lg w-full bg-gray-100' placeholder="First Name" type="text" name="name" />  
            </div>
            <div className='w-full'>
                <input className='body3 md:py-[14px] py-3 px-5 bg-surface rounded-lg w-full bg-gray-100' placeholder="Email" type="email" name="email" />  
            </div>
            <div className='w-full select-arrow-none relative'>
                <select className='body3 md:py-[14px] py-3 px-5 bg-surface rounded-lg w-full bg-gray-100' name="category">
                    <option value="Financial Planning">Financial Planning</option>
                    <option value="Business Planning">Business Planning</option>
                    <option value="Development Planning">Development Planning</option>
                </select>
                <Icon.CaretDown className='absolute top-1/2 -translate-y-1/2 right-5' />
            </div> 
        </div>
        <button className='button-main flex-shrink-0 bg-black hover:bg-blue-500 text-white rounded-full'>Submit</button>
    </form>
};

export default SectionForm;